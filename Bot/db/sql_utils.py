import sqlite3


class DataLayer():
    cur = None

    def __init__(self) -> None:
        if DataLayer.cur is None:
            conn = sqlite3.connect('db/bank_db.db')
            DataLayer.cur = conn.cursor()

    def show_categories(self):
        sql = """SELECT * FROM 'category'"""
        self.cur.execute(sql)
        return self.cur.fetchall()

    def show_products(self, category_id):
        sql = ("""SELECT * FROM 'products' WHERE 'category_id' = '%s'""" %
               (category_id))
        self.cur.execute(sql)
        print(self.cur.fetchall())
        return self.cur.fetchall()

    def get_user(self,user_id):
        sql = ("""SELECT * FROM 'users' WHERE id = %s""" %
                (user_id))
        self.cur.execute(sql)
        return self.cur.fetchall()     
db = DataLayer()
