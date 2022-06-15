close all;
clear all;

[filename, pathname] = uigetfile('*.mp4', 'video');
filename=strcat(pathname,filename);
video=VideoReader(filename);
frame = read(video,1);
n = video.NumFrames;
[x,y,z]=size(frame);
out = zeros(x,y,n); 
vid = uint8(out);
for i = 1:n
    frames = read(video,i);
    frames=rgb2gray(frames);
    vid(:,:,i)=frames;
    frame_detected_c=detection_contour(frames);
    out(:,:,i)=frame_detected_c;
end
 
figure;
for i = 1:n
   subplot(121);imshow(vid(:,:,i));
   title('Video Originale en GRAY');
   subplot(122);imshow(out(:,:,i));
   title('Detection de Contour');
   drawnow;
   pause(0.5);
end

