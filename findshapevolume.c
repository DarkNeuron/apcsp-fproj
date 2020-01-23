#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <math.h>

float volumeOfCylinder(float radius, float height) {
	float radsq = pow(radius, 2);
	float tmpvol = 3.14 * radsq * height;
	return tmpvol;
}

float volumeOfCone(float radius, float height) {
	float tempvol;
	tempvol = volumeOfCylinder(radius, height) / 3;
	return tempvol;
}

float volumeOfHexPyr(float bedgel, float height) {
	double other = sqrt(3) / 2;
	double edgesq = pow(bedgel, 2);
	float tempvol = other * edgesq * height;
	return tempvol;
}

int main(int argc, char* argv[]) {
  float minr, maxr, radius, height, bedgel, vol;

	if ((int)atof(argv[1]) == 1) {
		radius = atof(argv[2]);
		height = atof(argv[3]);
		minr = atof(argv[4]);
		maxr = atof(argv[5]);
		if (minr > maxr) {
			int temp = 0;
			temp = minr;
			minr = maxr;
			maxr = temp;
		}
		for (float i = minr; i <= maxr; i++) {
  			vol = volumeOfCylinder(radius, height);
    			printf("The volume of this cylinder with a radius of %f is %f\n", radius, vol);
			radius++;
  		}
	}

	else if ((int)atof(argv[1]) == 2) {
		radius = atof(argv[2]);
		height = atof(argv[3]);
		minr = atof(argv[4]);
		maxr = atof(argv[5]);
		if (minr > maxr) {
			int temp = 0;
			temp = minr;
			minr = maxr;
			maxr = temp;
		}
		for (float i = minr; i <= maxr; i++) {
  			vol = volumeOfCone(radius, height);
    			printf("The volume of this cone with a radius of %f is %f\n", radius, vol);
			radius++;
  		}
	}

	else if ((int)atof(argv[1]) == 3) {
		bedgel = atof(argv[2]);
		height = atof(argv[3]);
		minr = atof(argv[4]);
		maxr = atof(argv[5]);
		if (minr > maxr) {
			int temp = 0;
			temp = minr;
			minr = maxr;
			maxr = temp;
		}
		for (float i = minr; i <= maxr; i++) {
	  		vol = volumeOfHexPyr(bedgel, height);
    			printf("The volume of this hexagonal pyramid with a height of %f is %f\n", height, vol);
			height++;
  		}
	}

}
