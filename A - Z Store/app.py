from flask import Flask,render_template,request, redirect, flash, url_for, session, g

import file_operation as fo

app = Flask(__name__)


@app.route('/')
@app.route('/index')
def index():
    return render_template('index.html')

# Admin Page Routes Goes Here

@app.route('/adminlogin' , methods = ['POST'])
def adminlogin():
    uname = request.form['uname']
    pwd = request.form['pwd']
    if request.method == 'POST':
        if uname != 'admin' or pwd != 'admin':
            return redirect(url_for('index'))
        else:
            session['username'] = 'admin'
            return redirect(url_for('admin'))

@app.route('/admin')
def admin():
    if 'username' in session:
        res = fo.product_list()
        return render_template('AdminAfterLogin.html' , res = res)
    else:
        return redirect(url_for('error'))
        
@app.route('/adminlogout')
def AdminLogout():
    session.pop('username',None)
    return redirect(url_for('index'))

@app.route('/addproduct')
def AdminAddProduct():
    if 'username' in session:
        return render_template('AddProduct.html')
    else:
        return redirect(url_for('error'))

@app.route('/addproductbackend' , methods = ['POST'])
def AddProductBackend():
    name = request.form['pname']
    des = request.form['pdes']
    price = request.form['pprice']
    if fo.add_product(name,des,price):
        return redirect(url_for('admin'))
    else:
        return redirect(url_for('addproduct'))

@app.route('/updatedelete')
def updatedelete():
    if 'username' in session:
        res = fo.product_list()
        return render_template('update_delete.html' , res = res)
    else:
        return redirect(url_for('error'))
    
@app.route('/delete/<id>')
def deleteProduct(id):
    if 'username' in session:
        if(fo.delete_product(id)):
            return redirect(url_for('admin'))
        else:
            return render_template(url_for('updatedelete'))
    else:
        return redirect(url_for('error'))
    

@app.route('/updateproduct/<id>')
def updateProduct(id):
    res = fo.update_product_details(id)
    return render_template('update.html' , res = res)

@app.route('/updateproductbackend/<id>' , methods = ['POST'] )
def updateBackend(id):
    name = request.form['pname']
    des = request.form['pdes']
    price = request.form['pprice']
    if fo.update_backend(id,name,des,price):
        return redirect(url_for('admin'))
    else:
        return redirect(url_for('updatedelete'))
    
@app.route('/adminvieworder')
def adminViewOrder():
    res = fo.shop_names()
    return render_template('adminorderview.html' , res = res)

@app.route('/vieworderbystore/<shopname>')
def viewOrderbyStore(shopname):
    if 'username' in session:
        res , amt = fo.bill(shopname)
        return render_template('displayorder.html' , res = res , amt = amt , sname = shopname)
    else:
        return redirect(url_for('error'))
    
@app.route('/paymentdone/<sname>')
def delBill(sname):
    if fo.delBill(sname):
        return render_template('adminorderview.html')
    else:
        return render_template('adminorderview.html')

# User Routes Goes Here

@app.route('/signup')
def signup():
    return render_template('create_user.html')

@app.route('/CreateAccount' , methods = ['POST'])
def create_account():
    name = request.form['name']
    pnumber = request.form['pnumber']
    sname = request.form['sname']
    address = request.form['address']
    uname = request.form['uname']
    pwd = request.form['pwd']
    if(fo.create_account(name,pnumber,sname,address,uname,pwd)):
        flash("Account Created Successfully!")
        return redirect(url_for('index'))
    else:
        flash("Account Creation Failed!")
        return redirect(url_for('signup'))

@app.route('/login' , methods = ['POST'] )
def student_login():
    uname = request.form['uname']
    pwd = request.form['pwd']
    res = fo.user_checking(uname)
    r = res.split('|')
    if r[4]!=uname and pwd!=r[5]:
        return redirect(url_for('index'))
    else:
        session['storename'] = r[2]
        return redirect(url_for('user'))

@app.route('/user')
def user():
    if 'storename' in session:
        res = fo.product_list()
        return render_template('userAfterLogin.html' , res = res , name = session['storename'])
    else:
        return redirect(url_for('error'))
    
@app.route('/addtocart/<sname>' , methods = ['POST'])
def addTocart(sname):
    id = request.form['pid']
    quant = request.form['quant']
    if fo.add_to_cart(id,quant,sname):
        return redirect(url_for('user'))
    else:
        return redirect(url_for('user'))

@app.route('/uservieworder')
def viewUserorder():
    if 'storename' in session:
        res , amt = fo.bill(session['storename'])
        return render_template('UserOrder.html' , res = res , name = session['storename'] , amt = amt)
    else:
        return redirect(url_for('error'))


@app.route('/userlogout')
def userLogout():
    session.pop('username',None)
    return redirect(url_for('index'))

@app.route('/error')
def error():
    return render_template('error.html')

if __name__ == '__main__':
    app.secret_key = "Don't Tell Any One"
    app.run(port=7777,debug=True)