#!/bin/bash
# Bash Menu Script For sync-ing this whole thing with my cloud folder
# run with:  bash ./sync-photos.sh

PS3='Please enter your choice: '
options=("Backup" "Copy" "Replace" "Quit")
select opt in "${options[@]}"
do
    case $opt in
        "Backup")
            echo "Moving to Backup folder"
            mv ./storage/app/public/photos ./storage/app/public/photos-bck
            ;;
        "Copy")
            echo "Copying from pCloud"
            rclone copy -v pcloud:Fotografii/__iosifv.com ./storage/app/public/photos
            ;;
        "Replace")
            echo "you chose choice $REPLY which is $opt"
            rm -rfv ./storage/app/public/photos && rclone copy -v pcloud:Fotografii/__iosifv.com ./storage/app/public/photos
            ;;
        "Quit")
            break
            ;;
        *) echo "invalid option $REPLY";;
    esac
done
