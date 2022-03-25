#include <iostream>
#include <cstdlib>
#include <cstring>
/* run this program using the console pauser or add your own getch, system("pause") or input loop */
using namespace std;


char* getline() {

	char buffer[1000];
	int pos = 0;

	while (1) {


		int c = getchar();


		buffer[pos] = c;


		pos++;


		if (c == '\n') {
			break;
		}

	}

	buffer[pos] = '\0';

	char* res = (char*)malloc(pos + 1);

	for (int i = 0; i <= pos; ++i) {
		res[i] = buffer[i];
	}

	return res;
}


int main() {
	
	char* b = getline();
	cout<<b;
	free(b);
}
