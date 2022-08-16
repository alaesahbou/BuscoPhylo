#write out current crontab
crontab -l > mycron
#echo new cron into cron file
echo "*/1 * * * * php busco.php >> busco_script.log" >> mycron
#install new cron file
crontab mycron
rm mycron
