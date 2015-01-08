#!/bin/bash
partNum=$1
token=$2
ID=$3    

	for ((a=1;a<=1000000;a++));do;done;
  
	sleep 60	

	cd /var/www/chinavec/upload/upload/tmp/
	sleep 60
	for ((i=1;i<=$partNum;i++))do echo $token-$i;done | xargs -i cat {} > /var/www/chinavec/upload/upload/tmp/$token.mpg;

	#/root/bin/ffmpeg -i $token.mpg -y -f image2 -ss 60 -t 0.001 -s 1350x523 /var/www/chinavec/data-storage/video/poster/h/$ID.jpg;
	sleep 1800	
	
	/root/bin/ffmpeg -i $token.mpg -q:v 1 /var/www/chvec_auth/video/$ID.mp4
	
	sleep 1000
	
	cd /var/www/chinavec/upload/upload/tmp/
	
	for ((i=1;i<=$partNum;i++));do rm -rf $token-$i;done;

	#rm -rf  *
