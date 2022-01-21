# Git

The most important Git commands.

## Setup

### Initialize an existing directory

    git init

### Clone a repository

    git clone https://url/of/repository.git

## Stage

### Show the status of a repository

    git status

### Add a file to your next commit

    git add [file]

### Remove / unstage a file and keep the changes

    git reset [file]

### Delete a file and stage the removal

    git rm [file]

### Move a file and stage that

    git mv [existing-path] [new-path]

### Diff of what is changed but not staged

    git diff 

### Diff of what is staged but not committed

    git diff --staged

### commit the staged content

    git commit -m "[discription]"

## Branch & Merge

### List you branches

    git branch

### Create a new branch

    git branch [branch-name]

### switch to another branch

    git checkout [branch-name]

### Merge a branch into the current one

    git merge [branch-name]

### The commits of the current branch

    git log

## Remote share & update

### Fetch an merge any commits from the remote branch

    git pull

### Transmit the local commits to the remote repository

    git push

## See also

- https://education.github.com/git-cheat-sheet-education.pdf