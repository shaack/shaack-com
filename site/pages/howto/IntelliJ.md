# JetBrains, IntelliJ, WebStorm etc.

## Disable code formatter for specific areas in the code

- Under `Settings / Editor / Code Style / Formatter` activate the `Turn formatter on/off with markers in code comments`
  option.
- Turn the formatter off and on with the `@formatter:off` and `@formatter:on` comments.

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

