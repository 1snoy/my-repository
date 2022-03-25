#include <iostream>
#include <cstdlib>

using namespace std;
#define size 6
/* run this program using the console pauser or add your own getch, system("pause") or input loop */

int main(int argc, char** argv) {
	int *arr;
	arr = new int[3];
	
	for (int i = 0;i < size;++i){
		
		arr[i] = rand();
		cout<<arr[i]<<" ";
		
	}
	
	int min;
	int t;
	
	for (int i = 0; i < size; i++) {
		
  		min = i;
  		
  		for (int j = i + 1; j < size; j++)
  			
  			if (arr[min] > arr[j])
  				
  				min = j;
				t = arr[min];
				arr[min] = arr[i];
				arr[i] = t;
				
	}
    
	cout<<endl<<endl;
	
	for (int i = 0;i < size;++i){
		
		cout<<arr[i]<<" ";
		
	}
	
	delete[] arr;
	
}
