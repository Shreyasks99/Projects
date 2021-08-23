import uuid
import os , glob  

def create_account(name,pnum,sname,address,uname,pwd):
    data = name + '|' + pnum + '|' + sname + '|' + address + '|' + uname + '|' + pwd + '$'
    fp = open('Files/Users.txt','a')
    fp.write(data)
    fp.close()
    return True

def add_product(name,des,price):
    id = str(uuid.uuid4())
    id = id[:6]
    data = str(id) + '|' + name + '|' + des + '|' + str(price) + '$'
    fp = open('Files/Products.txt','a')
    fp.write(data)
    fp.close()
    return True

def product_list():
    fp = open('Files/Products.txt','r')
    data = fp.read()
    li = []
    res = data.split('$')
    for r in res:
        l = r.split('|')
        li.append(l)
    li.pop()
    return li

def delete_product(id):
    fp = open('Files/Products.txt','r')
    data = fp.read()
    fp.close()
    li = []
    res = data.split('$')
    for r in res:
        if r.startswith(id):
            continue
        else:
            li.append(r)
    final_r = '$'.join(li)
    fp = open('Files/Products.txt','w')
    fp.write(final_r)
    fp.close()
    return True

def update_product_details(id):
    fp = open('Files/Products.txt','r')
    data = fp.read()
    fp.close()
    li = []
    res = data.split('$')
    for r in res:
        if r.startswith(id):
            l = r.split('|')
            li.append(l[0])
            li.append(l[1])
            li.append(l[2])
            li.append(l[3])
        else:
            continue
    return li

def update_backend(id,name,des,price):
    fp = open('Files/Products.txt','r')
    data = fp.read()
    fp.close()
    li = []
    res = data.split('$')
    for r in res:
        if r.startswith(str(id)):
            continue
        else:
            li.append(r)
    li.pop()
    st = id + '|' + name + '|' + des + '|' + price + '$'
    li.append(st)
    final_r = '$'.join(li)
    fp = open('Files/Products.txt','w')
    fp.write(final_r)
    fp.close()
    return True

def user_checking(uname):
    fp = open('Files/Users.txt','r')
    data = fp.read()
    fp.close()
    res = data.split('$')
    for r in res:
        l = r.split('|')
        if l[4] == uname:
            return r
        else:
            continue
    return 'NO'

def add_to_cart(pid,quant,sname):
    fp = open('Files/Products.txt','r')
    data = fp.read()
    fp.close()
    data1 = ''
    res = data.split('$')
    for r in res:
        if r.startswith(pid):
            l = r.split('|')
            data1 = pid + '|' + l[1] + '|' + l[3] + '|' + str(quant) + '$'
        else:
            continue
    if data1 != '':
        fname = sname + '.txt'
        fp = open(fname,'a')
        fp.write(data1)
        fp.close()
        return True
    else:
        return False

def bill(sname):
    fname = sname + '.txt'
    fp = open(fname,'r')
    amt = 0
    data = fp.read()
    fp.close()
    res = data.split('$')
    res.pop()
    li = []
    for r in res:
        l = r.split('|')
        amt = amt + (float(l[-2]) * float(l[-1]))
        li.append(l)
    return li,amt

def shop_names():
    li = []
    for file in glob.glob("*.txt"):
        li.append(file)
    li2 = []
    for l in li:
        r = l.split('.')
        li2.append(r[0])
    return li2

def delBill(sname):
    fname = sname + '.txt'
    os.remove(fname)
    return True



    



    


    