@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../vendor/cradlephp/command-line/bin/cradle
php "%BIN_TARGET%" %*
