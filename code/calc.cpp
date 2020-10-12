#include <bits/stdc++.h>
using namespace std;


/*
$$表示会议
$表示期刊
会议： 
	数字	会议名	年份	deadline
	
	会议名：
		冒号之前都是简称
		 
期刊： 
	数字	刊名	刊全名	deadline
*/
string name,deadline;
string tname,tfname;
void showtrans(){
	while(tname.size()>0&&tname[0]==' ')tname=tname.substr(1,tname.size()-1);
	while(tfname.size()>0&&tfname[0]==' ')tfname=tfname.substr(1,tfname.size()-1);
	while(tname.size()>0&&tname[tname.size()-1]==' ')tname=tname.substr(0,tname.size()-1);
	while(tfname.size()>0&&tfname[tfname.size()-1]==' ')tfname=tfname.substr(0,tfname.size()-1);
	for(int i=tname.size()-1;i>=0&&tname.size()>0;i--)
		if(tname[i]=='\'')tname=tname.substr(0,i)+"\\"+tname.substr(i,tname.size()-i);
	for(int i=tfname.size()-1;i>=0&&tfname.size()>0;i--)
		if(tfname[i]=='\'')tfname=tfname.substr(0,i)+"\\"+tfname.substr(i,tfname.size()-i);
	printf("UPDATE message SET deadline='%s' WHERE name='%s' OR name='%s' OR fullname='%s' OR fullname='%s';\n",deadline.data(),tname.data(),tfname.data(),tname.data(),tfname.data());	
}
void show(){
	string sname,fname;
	sname=fname="";
	for(int i=0;i<name.size();i++){
		if(name[i]==':'){
			sname=name.substr(0,i);
			fname=name.substr(i+1,name.size()-i-1);
		}
	}
	while(sname.size()>0&&sname[0]==' ')sname=sname.substr(1,sname.size()-1);
	while(fname.size()>0&&fname[0]==' ')fname=fname.substr(1,fname.size()-1);
	while(sname.size()>0&&sname[sname.size()-1]==' ')sname=sname.substr(0,sname.size()-1);
	while(fname.size()>0&&fname[fname.size()-1]==' ')fname=fname.substr(0,fname.size()-1);
	for(int i=sname.size()-1;i>=0&&sname.size()>0;i--)
		if(sname[i]=='\'')sname=sname.substr(0,i)+"\\"+sname.substr(i,sname.size()-i);
	for(int i=fname.size()-1;i>=0&&fname.size()>0;i--)
		if(fname[i]=='\'')fname=fname.substr(0,i)+"\\"+fname.substr(i,fname.size()-i);
	printf("UPDATE message SET deadline='%s' WHERE name='%s' OR fullname='%s';\n",deadline.data(),sname.data(),fname.data());
}
int main(){
	freopen("out.txt","r",stdin);
	freopen("b.txt","w",stdout);
	string s;
	while(getline(cin,s)){
		if(s=="$"){
			getline(cin,s);	
			getline(cin,s);	
			tname=s;
			getline(cin,s);	
			tfname=s;
			getline(cin,s);	
			deadline=s;
			showtrans();
		}else if(s=="$$"){
			getline(cin,s);	
			getline(cin,s);	
			name=s;
			getline(cin,s);	
			getline(cin,s);				
			deadline=s;
//			show();
		}
	}
	return 0;
}
