#!/bin/bash
partNum=$1
token=$2
ID=$3
radio=$4        
num=2	
k=1
	cd /var/www/chinavec/upload/upload/tmp/
	
	for ((i=1;i<=$partNum;i++))do echo $token-$i;done | xargs -i cat {} > /var/www/chinavec/upload/upload/tmp/$token.mpg;
	
	#sleep 20
	#ffprobe -v quiet -print_format json -show_format -show_streams #{source}	

	#截图
	#/root/bin/ffmpeg -i $token.mpg -y -f image2 -ss 60 -t 0.001 -s 1350x523 /var/www/chinavec/data-storage/video/poster/h/$ID.jpg;
	/usr/local/zend/bin/php /var/www/chinavec/upload/updateimg.php ID ${ID} token ${token}

	#截图
	#/root/bin/ffmpeg -ss 20 -i $token.mpg -y -f image2 -t 0.001 -s 1350x523 /var/www/chinavec/upload/imgtmp/$ID-1.jpg;
	#/root/bin/ffmpeg -ss 50 -i $token.mpg -y -f image2 -t 0.001 -s 1350x523 /var/www/chinavec/upload/imgtmp/$ID-2.jpg;
	#/root/bin/ffmpeg -ss 80 -i $token.mpg -y -f image2 -t 0.001 -s 1350x523 /var/www/chinavec/upload/imgtmp/$ID-3.jpg;
	#时长
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


while [ 1 ]
do
	covernum=`/usr/local/zend/bin/php /var/www/chinavec/upload/getNum.php`
	
	while [ "$covernum" -lt "$num" ]
	do
	#/usr/local/zend/bin/php /var/www/chinavec/select.php ID ${ID} status 1
	/usr/local/zend/bin/php /var/www/chinavec/upload/update.php ID ${ID} status 1
	#加片头
	if [ $radio ]; then
	   #cat $token.mpg /var/www/chvec_auth/headermv/$radio.mpg > $token-$radio.mpg
	   #/root/bin/ffmpeg -i $token.mpg -q:v 3 $token.mp4
	   #/root/bin/ffmpeg -i $token.mp4 -vcodec copy -acodec copy -vbsf h264_mp4toannexb $token.ts
  	   #/root/bin/ffmpeg -i "concat:/var/www/chvec_auth/headermv/header1.ts|/var/www/chinavec/upload/upload/tmp/$token.ts" -acodec copy -vcodec copy -absf aac_adtstoasc /var/www/chvec_auth/video/$ID.mp4
	   #cat /var/www/chvec_auth/headermv/$radio.mpg /var/www/chinavec/upload/upload/tmp/$token-1.mpg  > /var/www/chinavec/upload/upload/tmp/$token-$radio.mpg
	   #/root/bin/ffmpeg -threads 2 -i $token-$radio.mpg -q:v 3 /var/www/chvec_auth/video/$ID.mp4
	   #/root/bin/ffmpeg -threads 2 -i concat:"/var/www/chvec_auth/headermv/$radio.mpg|/var/www/chinavec/upload/upload/tmp/$token-1.mpg" -vcodec libx264 -acodec libfdk_aac /var/www/chvec_auth/video/$ID.mp4
	   /root/bin/ffmpeg -threads 2 -i $token.mpg -q:v 3 $token-1.mpg
	   /root/bin/ffmpeg -threads 2 -i concat:"/var/www/chvec_auth/headermv/$radio.mpg|/var/www/chinavec/upload/upload/tmp/$token-1.mpg" -c:v libx264 -preset ultrafast -c:a libfdk_aac /var/www/chvec_auth/video/$ID.mp4
	else 
	   #/root/bin/ffmpeg -i $token.mpg -q:v 3 /var/www/chvec_auth/video/$ID.mp4
	   /root/bin/ffmpeg -threads 2 -i $token.mpg  -c:v libx264 -preset ultrafast -c:a libfdk_aac -q:v 3 /var/www/chvec_auth/video/$ID.mp4
	fi
	

	#/root/bin/ffmpeg -i concat:"" -q:v 1 /var/www/result.mp4
	#for((i=1;i<=31;i++));do a=5343d5de3c223-$i;a="$a|";b="$b$a";echo$b;done | xargs
	#sleep 60
	
	#cd /var/www/chinavec/upload/upload/tmp/
	/usr/local/zend/bin/php /var/www/chinavec/upload/update.php ID ${ID} status 2
	for ((i=1;i<=$partNum;i++));do rm -rf $token-$i;done;
	#sleep 1d;
	rm -f $token-1.mpg;
	#rm -rf  *
	sleep 10
	exit 0
	done
	#rm -rf  *
	sleep 20
done
