#!/bin/bash
token=$1
ID=$2 	
k=1
	cd /var/www/chinavec/upload/upload/tmp/
	
	#sleep 20
	#ffprobe -v quiet -print_format json -show_format -show_streams #{source}	

	#/usr/local/zend/bin/php /var/www/chinavec/upload/uploadImg.php token ${token}

	#鎴浘
	#/root/bin/ffmpeg -ss 20 -i $token.mpg -y -f image2 -t 0.001 -s 1350x523 /var/www/chinavec/upload/imgtmp/$ID-1.jpg;
	#/root/bin/ffmpeg -ss 50 -i $token.mpg -y -f image2 -t 0.001 -s 1350x523 /var/www/chinavec/upload/imgtmp/$ID-2.jpg;
	#/root/bin/ffmpeg -ss 80 -i $token.mpg -y -f image2 -t 0.001 -s 1350x523 /var/www/chinavec/upload/imgtmp/$ID-3.jpg;
	#鏃堕暱
	time=`/root/bin/ffmpeg -i $token.mpg 2>&1 | grep 'Duration' | cut -d '' -f 4 | sed s/,//`;
	hour=`echo "$time" | awk -F':' '{print int($2)}'`
	min=`echo "$time" | awk -F':' '{print int($3)}'`
	sec=`echo "$time" | awk -F':' '{print int($4)}'`
	timenum=`expr $((((hour*3600))+$((min*60))+$sec))`;
	
	while [ "$k" -le 8 ]
	do
	#num=`awk "BEGIN{srand($RANDOM);int(rand()*100)}"`;
	declare -i randnum=$RANDOM*$timenum/32767
	#echo $randnum
	/root/bin/ffmpeg -ss $randnum -i $token.mpg -y -f image2 -t 0.001 -s 1350x523 /var/www/chinavec/upload/imgtmp/$ID-$k.jpg;
	k=$((k+1));
	done
	exit 0
