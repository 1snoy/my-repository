#include <iostream>
using namespace std;
int GetLen(char *str){
	
    int l;
    for(l=0;*str;++str,++l);
    return l;
}
 
int main(){
 
    char str[1000];
    int i = 0;
    while (1) {

		int c = getchar();

		str[i] = c;

		i++;

		if (c == '\n') {
			str[i] = 0;
			break;
		}

	}
    cout<<"Length: "<<GetLen(str) - 1;
    cin.get();
}
