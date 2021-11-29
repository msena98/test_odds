# Importing Selenium WebDriver and Panda
from selenium import webdriver
import pandas as pd

# Creating instance of Chrome WebDriver
driver = webdriver.Chrome()

# Navigating to page by URL
driver.get("https://finance.yahoo.com/quote/BTC-EUR/history/")

# Getting the information about Date and Close columns 
dates = driver.find_elements_by_xpath('//tbody/tr/td[1]/span')
closes = driver.find_elements_by_xpath('//tbody/tr/td[5]/span')

# Creating dictionary with header columns and getting only last 10 days info
content_result = []
days = 10
for i in range(days):
    temporary_data={'Date' : dates[i].text,
                    'Close' : closes[i].text}
    content_result.append(temporary_data)
    
# Formating info and creating CSV file
df_data = pd.DataFrame(content_result)
df_data.to_csv('eur_btc_rates.csv', index=False)





















#global content
#content = []
#global counter
#counter = 0
#for element in driver.find_elements_by_css_selector('td > span'):
 #   content.append(element.text)
  #  counter += 1
   # if counter == 60:
    #  break
    

#print(content)