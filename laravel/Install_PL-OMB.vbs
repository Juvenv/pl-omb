Set oShell = WScript.CreateObject("WSCript.shell")
dim command

command = "echo Baixando dependencias Composer e NPM... & "
command = command & "echo Apenas aguarde todas as janelas fecharem e estara pronto! & echo, &"
command = command & "echo (Obs: O tempo descrito abaixo não é tempo para término) & "
command = command & "timeout 30"

oShell.run "cmd /C composer install"
oShell.run "cmd /C npm install"
oShell.run "cmd /C " & command

