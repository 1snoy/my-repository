#include <iostream>
#include <cstring>
using namespace std;
/* run this program using the console pauser or add your own getch, system("pause") or input loop */
struct Person{
	
	char first_name[100];
	char last_name[100];
	int age;
	
	void description(){
		
		cout << "______________________________________" << endl;
		cout << "���: " << first_name << endl;
		cout << "�������: " << last_name << endl;
		cout << "�������: " << age << endl;
		
	}
};
int main(int argc, char** argv) {
	
	setlocale (0,"Russian");
	
	Person p;
	
	strcpy(p.first_name, "����");
	strcpy(p.last_name, "������");
	p.age = 17;
	p.description();
	
	Person p2;
	strcpy(p2.first_name, "���� ");
	strcpy(p2.last_name, "�����");
	p2.age = 23;
	p2.description();
	
	Person p3;
	strcpy(p3.first_name, "�����");
	strcpy(p3.last_name, "�������");
	p3.age = 16;
	p3.description();
	
	Person p4;
	strcpy(p4.first_name, "����");
	strcpy(p4.last_name, "��������");
	p4.age = 16;
	p4.description();
}
