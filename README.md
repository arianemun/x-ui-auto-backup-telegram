# x-ui-auto-backup-telegram
The bot backs up the x-ui database and sends it to the Telegram bot

**Update Servers:**
```
apt update -y
```

**Install Dependencies:**
```
apt install lsb-release ca-certificates apt-transport-https software-properties-common -y
add-apt-repository ppa:ondrej/php
apt install php8.2 -y
apt-get install php-curl -y
```

**Change x-ui Database and Configs files permissions access:**
```
chmod -R 777 /etc/x-ui/x-ui.db
chmod -R 777 /usr/local/x-ui/bin/config.json
```

Clone this repository
```
git clone https://github.com/arianemun/x-ui-auto-backup-telegram.git && cd /x-ui-auto-backup-telegram
```

**Edit tbot_init.php via nano or vim**

1. Creat a bot in telegram with @botfather
2. Insert **BOT-TOKEN** at **line 6** instead **TOKEN**
```
$url = 'https://api.telegram.org/botTOKEN' . $method;
```
3. Change backups file's descriptions at line 32.
```
$serverInfo = [
    "ipAddress" => "192.168.1.1",
    "severName" => "#Sx1"
];
```
4. Insert your ChatID at line 37 and 43
```
sendDocument(CHATID, new CURLFile('/etc/x-ui/x-ui.db')
```
```
sendDocument(CHATID, new CURLFile('/usr/local/x-ui/bin/config.json')
```

Now we have to create a cronjob, Follow this commands.
```
systemctl enable cron
crontab -e
```
Enter Number 1 and press enter

Insert this line to cronjob file to send files every 5 hours
```
*/5 * * * * /usr/bin/php /root/backup.php >/dev/null 2>&1
```

Every minute	* * * * *

Every Saturday at 23:45 (11:45 PM)	45 23 * * 6

Every Monday at 09:00 (9:00 AM)	0 9 * * 1

Every Sunday at 04:05 (4:05 AM)	5 4 * * SUN

Every weekday (Mon-Fri) at 22:00 (10:00 PM)	0 22 * * 1-5
