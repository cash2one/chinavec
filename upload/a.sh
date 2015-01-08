#!/bin/bash
partNum=$1
token=$2
ID=$3 


#b="echo"
#for i in "1 2 3 4 5"
#do
 #   b="$b $i"
#done
#eval "$b"	
	cd /var/www/chinavec/upload/upload/tmp/

	#ulimit -n 8192;

	#for ((i=1;i<=31;i++));do a=5343d5de3c223-$i'|';echo $a;done | xargs

	for((i=1;i<=$partNum;i++));do a=$token-$i;a="$a|";b="$b$a";done;

	#file="/var/www/chinavec/upload/upload/tmp/$token-$partNum"	
	#sleep 10m;	
	#if [ -f "$file" ];
	# then 	
	/root/bin/ffmpeg -y -i concat:"$b" -c copy /var/www/chinavec/upload/upload/tmp/$ID.mp4
	#fi
	


