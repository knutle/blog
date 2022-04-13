---
extends: _layouts.post
section: content
title: Configuring cross-targeting of NuGet packages
date: 2022-04-12
description: Useful when a package needs to support multiple dotnet versions
---

To enable cross-targeting for your library, simply edit your .csproj file and locate the **TargetFramework** property, then replace it with a **TargetFrameworks** property containing all the targets you wish to use. The **TargetFrameworks** tag contains a semicolon-separated list of **Target Framework Moniker (TFM)** values. See [https://docs.microsoft.com/en-us/dotnet/standard/frameworks](https://docs.microsoft.com/en-us/dotnet/standard/frameworks) for a list of available targets.

### Example config section for a package targeting .NET Core 3.1 and .NET 4.7.2

```
<PropertyGroup>
  <TargetFrameworks>netcoreapp3.1;net472</TargetFrameworks>
  <RootNamespace>Company.Namespace</RootNamespace>
</PropertyGroup>
```