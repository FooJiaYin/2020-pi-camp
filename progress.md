# 2020 π Camp Website

https://pi-camp-2020.steamedu.tw/

## Resource
### Layout
- Figma: https://www.figma.com/file/tq1EqqwtmLpJcKn18PWY59/Untitled?node-id=1%3A2

### Domain
- Gandi.net

### Github Repo
- https://github.com/FooJiaYin/2020-pi-camp

### HTML edit collaboration
- Repl.it: https://repl.it/@FooJiaYin/2020-pi-camp

### 金流
- 綠界: https://cashier.ecpay.com.tw/cashier/

### Form
- ~~Survey Cake~~ 沒有api串接金流
- 綠界表單功能: https://page.cashier.ecpay.com.tw/forms/dTF

### Deployment
- ~~Github Page~~
- Heroku: https://dashboard.heroku.com/apps/pi-camp-2020/activity
- https://pi-camp-2020.herokuapp.com/


### Table html Generator
- https://divtable.com/generator/


## Progress
6/28 (Sun)
- 討論資訊呈現
- 找template
- 阿文設計Figma

6/29 (Mon)
- 研究SurveyCake，金流的api
- 有三個方案
    1. 用綠借内建的表單
    優點：不用串接，大幅降低開發難度，可以填表和付款一次到位
    缺點：1. 需要離開官網填表單 2. 表單功能較少 3. excel需要手動輸出分享
    2. survey cake-免費 + 綠界
    優點：survey cake編輯表單容易，功能完全
    缺點：1. 表單跟金流分開，客人需要手動選擇金額 2. 不確定免費版是否有更新到google sheet的功能
    3. google sheet + 綠界
    優點：google sheet 免費版可以使用apps script
    缺點：1. 需要花時間研究apps script的寫法 2. 表單沒那麽漂亮
    4. 直接用php在網頁内寫表單
    優點：所有東西都可以客制化
    缺點：1. 要自己設計表單的css 2. 日後修改表單要通過程式（或者要花時間寫一個後台） 總之比較費工
- 最後決定方案1

7/1 (Tue)
- html文字架構

7/6 (Mon)
- 阿文完成CSS切版

7/7 (Tue)
- Layout edit
- Text edit @d1

7/8 (Wed)
- srollable table @0ven

7/9 (Thu)
- footer done