---
extends: _layouts.post
section: content
title: Simulating ternary operator in GitHub Actions Workflows
date: 2022-05-24
description: Standard ternary syntax doesn't seem to be available, but I found a handy replacement
categories: [github]
---

Using standard syntax we would have this expression:

```
conditition ? 'result if true' : 'result if false'
```

Then to achieve the same result in a workflow, we can do the following instead:

```
${{ conditition && 'result if true' || 'result if false' }}
```

Extracted from [https://github.com/actions/runner/issues/409](https://github.com/actions/runner/issues/409).