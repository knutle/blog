---
extends: _layouts.post
section: content
title: Cross-platform LF issues with snapshot testing in GitHub Actions
date: 2022-04-12
description: Sometimes there are some issues with inconsistent line endings from local environment to GitHub Actions
categories: [github]
---

Sometimes there are some issues with inconsistent line endings from local environment to GitHub Actions.

To address this we disable autocrlf and set global eol to lf before checkout in workflows.

```
git config --global core.autocrlf false
git config --global core.eol lf
```

This also requires the local environment to have the same settings. PHPStorm will warn about this, but this warning can be ignored.

Sometimes the repository state is bugged because some files were committed before autocrlf and eol settings were applied, then we need to force an update of the already committed files:

```
Add all your changed files back and normalize the line endings.

$ git add --renormalize .

Show the rewritten, normalized files.

$ git status

Commit the changes to your repository.

$ git commit -m "Normalize all the line endings"
```

(extracted from [https://docs.github.com/en/github/getting-started-with-github/configuring-git-to-handle-line-endings#refreshing-a-repository-after-changing-line-endings](https://docs.github.com/en/github/getting-started-with-github/configuring-git-to-handle-line-endings#refreshing-a-repository-after-changing-line-endings))
