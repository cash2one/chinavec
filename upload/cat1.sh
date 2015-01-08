#!/bin/bash
partNum=$1
token=$2
ID=$3        
	
	cd /var/www/chinavec/upload/upload/tmp/
	
	#sleep 60
	
	for ((i=1;i<=$partNum;i++))do echo $token-$i;done | xargs -i cat {} > /var/www/chvec_auth/video/$ID.mp4;
	
	#sleep 120
        
   	#/root/bin/ffmpeg -i $token.mpg -qscale 3 /var/www/chvec_auth/video/$ID.mp4
	# /root/bin/ffmpeg -i $token.mpg -y -f image2 -ss 60 -t 0.001 -s 1350x523 /var/www/chinavec/data-storage/video/poster/h/$ID.jpg;

	#/root/bin/ffmpeg -i $token.mpg -qscale 3 /var/www/chvec_auth/video/$ID.mp4
	
	sleep 60
	
	cd /var/www/chinavec/upload/upload/tmp/
	
	for ((i=1;i<=$partNum;i++));do rm -rf $token-$i;done;
