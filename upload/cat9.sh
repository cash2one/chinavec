#!/bin/bash
partNum=$1
token=$2
ID=$3        
	
	cd /var/www/chinavec/upload/upload/tmp/
	
	for ((i=1;i<=$partNum;i++))do echo $token-$i;done | xargs -i cat {} > /var/www/chinavec/upload/upload/tmp/$token.mpg;
	
	#sleep 20

	/root/bin/ffmpeg -i $token.mpg -y -f image2 -ss 60 -t 0.001 -s 1350x523 /var/www/chinavec/data-storage/video/poster/h/$ID.jpg;

	/root/bin/ffmpeg -i $token.mpg -q:v 3 /var/www/chvec_auth/video/$ID.mp4

	#/root/bin/ffmpeg -i concat:"" -q:v 1 /var/www/result.mp4
	#for((i=1;i<=31;i++));do a=5343d5de3c223-$i;a="$a|";b="$b$a";echo$b;done | xargs
	#sleep 60
	
	#cd /var/www/chinavec/upload/upload/tmp/
	
	#for ((i=1;i<=$partNum;i++));do rm -rf $token-$i;done;

	#rm -rf  *
