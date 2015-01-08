#!/bin/bash
partNum=$1
token=$2
ID=$3        
TM=$4
	
	cd /var/www/chinavec/upload/upload/tmp/
	
	for ((i=1;i<=$partNum;i++))do echo $token-$i;done | xargs -i cat {} > /var/www/chvec_auth/video/$ID.mp4;
	
