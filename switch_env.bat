@echo off

REM Controleer of een argument is meegegeven
if "%1"=="" (
    echo Gebruik: switch_env.bat [omgeving]
    echo Beschikbare omgevingen: ontwikkeling, testing, acceptatie, productie
    exit /b 1
)

REM Bepaal het juiste .env bestand op basis van het argument
set "ENV_FILE="
if "%1"=="ontwikkeling" set "ENV_FILE=.env.ontwikkeling"
if "%1"=="testing" set "ENV_FILE=.env.testing"
if "%1"=="acceptatie" set "ENV_FILE=.env.acceptatie"
if "%1"=="productie" set "ENV_FILE=.env.productie"

REM Controleer of het ENV_FILE is ingesteld
if "%ENV_FILE%"=="" (
    echo Ongeldige omgeving: %1
    echo Gebruik: switch_env.bat [omgeving]
    echo Beschikbare omgevingen: ontwikkeling, testing, acceptatie, productie
    exit /b 1
)

REM Kopieer het juiste .env bestand naar .env
copy "%ENV_FILE%" ".env" /Y
echo Geswitcht naar %1 omgeving (gebruikmakend van %ENV_FILE%)

REM Voer eventuele extra commando's uit, zoals het clearen van de cache
php artisan config:clear
php artisan cache:clear
php artisan config:cache