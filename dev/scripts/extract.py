import os
import sys
import glob
import time
import shutil

save_dir = os.path.expanduser('~/Documents/Paradox Interactive/Europa Universalis IV/save games/')
screenshot_dir = os.path.expanduser('~/Documents/Paradox Interactive/Europa Universalis IV/screenshots/')
output_dir = '../../extracted/'


i = 1

outputs = glob.glob(output_dir + '*')
if len(outputs) > 0:
    outputsnames = []
  
    for item in glob.glob(output_dir + '*'):
        outputsnames.append(int(os.path.basename(item)))

    i = max(outputsnames) + 1


while True:
    try: 
        save_file = save_dir + 'autosave.eu4'
        screenshots = glob.glob(screenshot_dir + '*') 
        new_save_out = output_dir + str(i)

        if os.path.exists(save_file) and len(screenshots) > 0:
            print("extracting...")
            latest_shot = max(screenshots, key=os.path.getctime)
             
            os.makedirs(new_save_out)

            os.replace(latest_shot, new_save_out + '/' + str(i) + '.png')
            os.replace(save_file, new_save_out + '/' + str(i) + '.eu4')

            i += 1

    except PermissionError as e:
        print("permission error. Retrying soon...")
        if os.path.exists(new_save_out):
            shutil.rmtree(new_save_out)


    time.sleep(5)
