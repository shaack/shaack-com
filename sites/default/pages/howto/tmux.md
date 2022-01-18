# tmux

Cheat sheet https://gist.github.com/henrik/1967800

```bash
tmux ls       # all running tmux sessions
tmux new      # start a new session
tmux a -t 0   # attach to the first session
tmux kill-server    # end the server, destroy all sessions
```

### ctrl-b

```
d           detach session
```

#### Windows

```
c           new window
,           name window
&           kill window
.           move window - prompted for a new number
```

#### Panes

```
%           horizontal split
"           vertical split

o           swap panes
q           show pane numbers
x           kill pane
⍽ space     toggle between layouts
```
### tmux.conf

http://www.deanbodenham.com/learn/tmux-conf-file.html
