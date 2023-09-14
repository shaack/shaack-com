# macOS

## Setup and default configuration

These are the steps I take to setup a new macOS installation.

### Increase keyboard speed

`Keyboard` > `Key repeat rate` and `Delay until repeat` all the way to the right

### Enable keyboard navigation

`Keyboard` > `Keyboard navigation` > `on`

### Enable standard function keys

`Keyboard` > `Keyboard Shortcuts` > `Function Keys` > `Use ... as standard function keys`

### Disable CapsLock

`Keyboard` > `Keyboard Shortcuts` > `Modifier Keys` > Caps Lock key `No action`

### Safari hard reload on shift-command-R

`Keyboard` > `Keyboard Shortcuts` > `App Shortcuts` > `Safari.app` > Set "Reload Page From Origin" to `shift-command-R`

### Switch window by command-^

`Keyboard` > `Keyboard Shortcuts` > `Keyboard` > Set `Move focus to next window` to `command-^`

### Change mouse cursor size

`Accessibility` > `Display` > `Pointer` > Set to first stroke

### Zoom with "control" key

`Accessibility` > `Zoom` > `Use scroll gesture with modifier keys to zoom`

`Modifier key for scroll gesture` > `^ control`

`Advanced` > Disable `Smooth images`

### Open documents and projects in tabs

`Desktop and Dock` > `Prefer tabs when opening documents` > `Always`

### Finder, show all file extensions

Finder `Settings` > `Advanced` > `Show all filename extensions`

### Finder, search in current folder

Finder `Settings` > `Advanced` > `When performing a search` > `Search the Current Folder`

## Further tips and tricks

### Flush and clear the DNS cache

```bash
dscacheutil -flushcache; sudo killall -HUP mDNSResponder
```

### Change the number of days shown in the calender week view

```bash
defaults write com.apple.iCal n\ days\ of\ week 10
```

