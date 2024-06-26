---
extends: _layouts.post
section: content
title: Uncovering Code Mysteries - Exploring Git History with the Pickaxe Option
date: 2024-06-22
description: Discover hidden gems or unravel the mystery of the deepest issues on Git history by using the pickaxe option to search for a string or regex.
cover_image: /assets/img/post_cover_detective.jpg
categories: [git]
featured: false
excerpt: Discover hidden gems or unravel the mystery of the deepest issues by using the pickaxe option in Git to search for a string or regex.
comments: true
---

Hey there, code adventurer! 

Ready to dive into the depths of Git history? Grab your magnifying glass because we're going on a journey to uncover the hidden gems - or deepest issues - in our codebase! We're talking about the mighty `-S` and `-G` options (also known as the "pickaxe" options) that are available for certain git commands.

In this article, we'll play code detective and check out some practical examples of using `git log` with the `-S` option to search on Git history for a string, along with other useful commands to complement our search. 

Let's get started!

## Commands available to Search Through Git History

We can investigate Git history using [git log](https://git-scm.com/docs/git-log), [git show](https://git-scm.com/docs/git-show), and [git diff](https://git-scm.com/docs/git-diff) commands (also [git diff-files](https://git-scm.com/docs/git-diff-files), [git diff-index](https://git-scm.com/docs/git-diff-index), and [git diff-tree](https://git-scm.com/docs/git-diff-tree)).

These commands offer two options that can be used to search:

**`-S <string>`**            search using a string  <br />
**`-G <regular expression>`**   search using a regular expression 

> **Fun Fact**: ["pickaxe" is the Git term for searching for a string](https://git-scm.com/docs/gitdiffcore#_diffcore_pickaxe_for_detecting_additiondeletion_of_specified_string). 
> It's our tool for digging through the repository's history to uncover commits that originally introduced or removed a specific string. Think of it as your personal treasure map for finding those elusive changes buried deep within the code.

## Using git log -S

The `git log -S` command helps search for commits that add or remove a given string. Here's how we wield this powerful tool:

```bash
git log -S <string>
```

**Example: Searching for "debugMode" String**

Imagine we're on the trail of the elusive "debugMode". We suspect it's been causing some mischief in our code. Simply run:

```bash
git log -S "debugMode"
```

Voilà! Git will present a list of commits where "debugMode" popped in or out of existence:

```bash
commit 27129a38d460f8608e3fb4f3earau4r79498i723s
Author: Dev <dev@example.com>
Date:   Mon Nov 27 22:51:52 2023 -0300

    Add debugging
```

### Mixing Options and Flags to Search Like a Pro

> **Clue**: 
> we can combine the plethora of options and flags available for
> `git log`, `git show`, and `git diff` commands to create a supercharged search that meet our needs.

Some examples:

#### Showing the Branch

Show the branch where the string it's lurking in by combining the `-S` option with the `--source --all` flags:

```bash
git log -S "debugMode" --source --all
```

The branch name will be shown alongside the commit hash (`refs/heads/add_debugging` in our example below) :

```bash
commit 27129a38d460f8608e3fb4f3earau4r79498i723s refs/heads/add_debugging
Author: Dev <dev@example.com>
Date:   Mon Nov 27 22:51:52 2023 -0300

    Add debugging
```

#### Case Insensitive Search

The `-i` or `--regexp-ignore-case` flags can be used to perform a case-insensitive search and catch those sneaky strings that try to hide by changing their case:

```bash
git log --regexp-ignore-case -S "debugMode"
```

or

```bash
git log -i -S "debugMode"
```

#### Unveiling the Full Story

To reveal the complete diff of what was changed, use one of these sleuthing commands:

```bash
git log -S "debugMode" --source --all --color -p
```

or 

```bash
git log -S "debugMode" -p --pickaxe-all 
```

They will display every detail of the changes coloring the clues to make the story crystal clear.

#### Time-Traveling Detective Work

To only show the results from a specific time period, we can use:

```bash
git log -S "debugMode" --since="2 weeks ago"
```

It will take we back in time to track down changes made in the last two weeks.

#### More Useful Git Options

Useful Git options that can be used together with the previous ones:

Find commits by a specific author that introduced "debugMode":

```bash
git log -S "debugMode" --author="Grace Hopper"
```

Limit the search to a specific file or directory to narrow down the treasure hunt:

```bash
git log -S "debugMode" -- path/to/file.php
```

Display commits in a single line:

```bash
git log -S "debugMode" --oneline
```

## Other Git Gadgets for our Search Toolbox

### git grep

While `git log -S` digs through the Git history, [git grep](https://git-scm.com/docs/git-grep) is our go-to for finding occurrences of a string in the current working directory. By default, it uses posix regex. 

```bash
git grep -l "debugMode" -- src
```

The command above will search for "debugMode" only on `src` directory of our working directory, displaying just the name of the files (`-l` flag) that contain matches.

### git log -G

For when we need to get fancy with regular expressions. The `-G` option in `git log` searches for commits that introduce or remove lines matching a given regex. It's the same as `git log -S` with a sprinkle of regex spice.

```bash
git log -G "debugMode\s*="
```

### git show

Once we've found the commit of our dreams (or nightmares), we can use [git show](https://git-scm.com/docs/git-show) to reveal its secrets.

```bash
git show <commit-hash>
```

For example:

```bash
git show 1a2b3c4d
```

### git diff -S

`git diff -S` is our trusty magnifying glass to see the difference between two commits where a specific string is involved.

For example, to compare changes involving `"debugMode"` between two commits, execute this command:

```bash
git diff -S "debugMode" <commit-hash1> <commit-hash2>
```

## Practical Examples

Some real-world scenarios where we can use our new Git superpowers:

#### Spotting the Root Cause of a Bug

Suspect a bug crept in with a variable change? Hunt it down!

```bash
git log -S "buggyVariable"
```

#### Tracking Feature Changes

Curious when a feature appeared or was changed? Follow the breadcrumb trail:

```bash
git log -S "newFeatureFunction"
```

#### Analyzing Code Evolution

Understand how a part of our code evolved over time by combining these options:

```bash
git log -S "criticalFunction" --since="2023-01-01" --until="2023-12-31"
```

#### Comparing Changes Between Commits

See how a specific string has changed between two points in time:

```bash
git diff -S "criticalFunction" abc1234 def5678
```

#### Identifying Code Removals

Find out when a piece of code disappeared:

```bash
git log -S "removedFunction"
```

Then, use the commit hash displayed to reveal its details:

```bash
git show <commit-hash>
```

## Conclusion

Being a code detective is a lot of fun, especially when we have tools like `git log -S` in our toolkit. 
So now that we are equipped with the pickaxe options and our other Git gadgets, we can kick off a thrilling quest to unlock the mysteries behind the code. Happy exploring!
