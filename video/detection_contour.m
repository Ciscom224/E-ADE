function [im1] = detection_contour(image)
image = filtrage(image); 
beta = 3.5;
im1=image;
for itt = 1:100
    im=im1;
    for i = 2:im-1
        for j= 2:y-1       
            [c0,c1]=generation_px(i,j,im);
            pixel0(i,j)= exp(-c0*beta)/(exp(-c0*beta)+exp(-c1*beta));
            if pixel0(i,j) > rand()
                im(i,j)=1;
            else
                im(i,j)=0;
            end
        end
    end
end
im1=im;