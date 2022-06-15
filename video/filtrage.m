
function [imbin] = filtrage(image)
   kh=[-1 -2 -1 ; 0 0 0 ; 1 2 1];
    kv=[-1 0 1 ; -2 0 2 ; -1 0 1];
       [x,y,z]=size(image); 
       if z >1  
            image = rgb2gray(image);
       end   
       image = ((255-0)/(max(image(:))-min(image(:))))*(image-min(image(:)));
       Sobellv = imfilter(image,kv);
       Sobellh = imfilter(image,kh);
       img = Sobellv+Sobellh;
       
      imbin = im2bw(img,0.2);


