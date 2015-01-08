#!/bin/bash
token=$1
ID=$2 	
frame=$3
	cd /var/www/chinavec/upload/upload/tmp/
	
	#鎴浘
	/root/bin/ffmpeg -ss $frame -i $token.mpg -y -f image2 -t 0.001 -s 1350x523 /var/www/chinavec/upload/imgtmp/$ID.jpg;
	
