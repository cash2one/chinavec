#!/bin/bash
partNum=$1
token=$2
ID=$3        
TM=$4
	#sleep 120
	
	cd /var/www/chinavec/upload/upload/tmp/

	#sleep 1200
	
	for ((i=1;i<=$partNum;i++))do echo $token-$i;done | xargs -i cat {} > /var/www/chinavec/upload/upload/tmp/$token.mpg;
	
	#sleep 40m

	/root/bin/ffmpeg -i $token.mpg -q:v 3 /var/www/chvec_auth/video/$ID.mp4
	
	sleep 10h
	
	cd /var/www/chinavec/upload/upload/tmp/
	
	for ((i=1;i<=$partNum;i++));do rm -rf $token-$i;done;		
	
	#rm -rf  *
#!/bin/bash
partNum=$1
token=$2
ID=$3 


	cd /var/www/chinavec/upload/upload/tmp/

	ulimit -n 655350;

	#for ((i=1;i<=31;i++));do a=5343d5de3c223-$i'|';echo $a;done | xargs

	for((i=1;i<=$partNum;i++));do a=$token-$i;a="$a|";b="$b$a";done;/root/bin/ffmpeg -y -i concat:"$b" -q:v 3 /var/www/chinavec/upload/upload/tmp/$ID.mp4

