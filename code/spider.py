from selenium import webdriver
import time
import socket
from selenium.webdriver.chrome.options import Options
import requests

chrome_options = Options()
# chrome_options.add_argument('--no-sandbox')
# chrome_options.add_argument('--headless')
browser = webdriver.Chrome(chrome_options=chrome_options)
pages = ["http://www.call4papers.cn/ccf/ccf-1.jsp",
         "http://www.call4papers.cn/ccf/ccf-2.jsp",
         "http://www.call4papers.cn/ccf/ccf-3.jsp",
         "http://www.call4papers.cn/ccf/ccf-4.jsp",
         "http://www.call4papers.cn/ccf/ccf-5.jsp",
         "http://www.call4papers.cn/ccf/ccf-6.jsp",
         "http://www.call4papers.cn/ccf/ccf-7.jsp",
         "http://www.call4papers.cn/ccf/ccf-8.jsp",
         "http://www.call4papers.cn/ccf/ccf-9.jsp",
         "http://www.call4papers.cn/ccf/ccf-10.jsp"]
# pages = ["http://www.call4papers.cn/ccf/ccf-1.jsp"]

f = open("out.txt", "w")
for page in pages:
    browser.get(page)
    table = browser.find_elements_by_class_name('table-tr-content')
    # 包含table-tr-type就是有意义的行
    # 包含jname就是期刊
    # 先只爬会议吧
    # print(page)
    for e in table:
        arr=e.find_elements_by_class_name("table-tr-type")
        if len(arr)==1:
            arr2=e.find_elements_by_class_name("table-tr-si")
            if len(arr2)==1:
                f.write("$\n")
            else:
                f.write("$$\n")
            f.write(e.text+"\n");
        # print(e.text);

    # browser.find_elements_by_xpath("//button[text()='start']")[0].click()
browser.close()
f.close()

# browser.get("http://www.call4papers.cn/ccf/ccf-1.jsp")
# r = requests.get("http://www.baidu.com/")
# r.encoding = r.apparent_encoding
# print(r.text)
