Set oShell = WScript.CreateObject("WSCript.shell")
dim command

command = ""
command = command & "echo                      ///////////////////////////////// & "
command = command & "echo                      //    PL-OMB (Ouvidoria v2)    // & "
command = command & "echo                      // By Vitor 'Pliavi' Silverio) // & "
command = command & "echo                      //-----------------------------// & "
command = command & "echo                      //        Bom Trabalho!        // & "
command = command & "echo                      ///////////////////////////////// & echo, &"
command = command & "echo             --------------------------------------------------- & "
command = command & "echo             #         Comandos Artisan Personalizados         # & "
command = command & "echo             --------------------------------------------------- & "
command = command & "echo             # validator:make [name] : Cria um novo validador  # & "
command = command & "echo             --------------------------------------------------- "


oShell.run "cmd /K gulp watch"
oShell.run "cmd /K php artisan serve"
oShell.run "cmd /K " & command

