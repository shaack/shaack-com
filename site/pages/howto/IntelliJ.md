# IntelliJ

## Enable SCSS Watcher on MacOS

### Install sassc with

```bash
brew install sassc
```

### Configuration

- Program `/opt/homebrew/bin/sassc`
- Arguments 
  - compressed `--sourcemap --style=compressed $FileName$ $FileNameWithoutExtension$.css`
  - not compressed `--sourcemap $FileName$ $FileNameWithoutExtension$.css`
- Output Path `$FileNameWithoutExtension$.css`

