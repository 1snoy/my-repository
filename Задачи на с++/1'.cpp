#include <iostream>
#include <cstdlib>
using namespace std;
#define size 6


int main(int argc, char** argv) {
	int *arr;
	arr = new int[size];
	
	for (int i = 0;i < size;++i){
		
		arr[i] = rand();
		cout<<arr[i]<<" ";
		
	}
	
	int t; 

    for (int i = 0; i < size - 1; i++) {
    	
        for (int j = 0; j < size - i - 1; j++) {
        	
            if (arr[j] > arr[j + 1]) {
            	
                t = arr[j];
                arr[j] = arr[j + 1];
                arr[j + 1] = t;
                
            }
        }
    }
    
	cout<<endl;
	
	for (int i = 0;i < size;++i){
		
		cout<<arr[i]<<" ";
		
	}
	
	delete[] arr;
	
}
