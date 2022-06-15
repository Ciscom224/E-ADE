function [c0,c1] = generation_px(i,j,image)
c0=0;
c1=0;
%filtre 
% 1 0 1
% 0 X 0
% 1 0 1
for k1 = i-1:i+1
    for k2=j-1:j+1
        if (k1==i+1 && k2==j-1) || (k1==i-1 && k2==j+1) || (k1==i-1 && k2==j-1) || (k1==i+1 && k2==j+1)
            
            if image(k1,k2) == 0
                c0=c0+1;
            else
                c1=c1+1;
            end
        end
    end
end