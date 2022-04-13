---
extends: _layouts.post
section: content
title: Allow artisan workers running on Windows to exit gracefully
date: 2022-04-13
description: By default, workers running on Windows do not exit gratefully when aborting worker queue
categories: [php, laravel]
---

First we need to extend the base Worker class and add some functionality to listen for Ctrl-C to trigger worker exit logic.

```php
use Illuminate\Queue\Worker;
use Illuminate\Queue\WorkerOptions;

class WindowsWorker extends Worker
{
    protected function supportsAsyncSignals()
    {
        return false;
    }

    public function daemon($connectionName, $queue, WorkerOptions $options)
    {
        $this->listenForSignals();
        parent::daemon($connectionName, $queue, $options);
    }

    protected function listenForSignals()
    {
        sapi_windows_set_ctrl_handler(function () {
            $pid = getmypid();
            echo "\n- Received Ctrl-C, will exit after current job finishes processing (process ID: {$pid}) -\n";
            $this->shouldQuit = true;
        });
    }
}
```

Then we need to extend the service container binding for queue workers to use our newly implemented WindowsWorker.

```php
class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->extend('queue.worker', function ($worker, $app) {
            $isDownForMaintenance = function () {
                return $this->app->isDownForMaintenance();
            };

            return new WindowsWorker(
                $app['queue'],
                $app['events'],
                $app[ExceptionHandler::class],
                $isDownForMaintenance
            );
        });
    }
```

This allows for graceful exit of workers when running through a service manager such as NSSM, which uses a Ctrl-C signal to perform service stop/restart.