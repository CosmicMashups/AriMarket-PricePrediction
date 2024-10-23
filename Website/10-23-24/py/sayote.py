# Import libraries
import pandas as pd
import numpy as np
import json
from statsmodels.tsa.arima.model import ARIMA

# FUNCTION: Training and testing the model on the full dataset
# Import libraries
import pandas as pd
import numpy as np
import json
from statsmodels.tsa.arima.model import ARIMA

# FUNCTION: Training and testing the model on the full dataset
def predict(commodity, csv_path, json_path, p, d, q):
    print(f'You have chosen {commodity}.')

    df = pd.read_csv(csv_path, index_col='Date', parse_dates=True)
    
    # Re-train the model on the entire dataset, then predict future prices
    model = ARIMA(df['High'], order=(p, d, q))
    model = model.fit(method_kwargs={'warn_convergence': False})

    # For Future Dates
    # index_future_dates = pd.date_range(start='2024-08-30', end='2024-11-30')
    index_future_dates = pd.date_range(start='2023-06-09', end='2023-07-30')
    
    # Run the prediction
    start = len(df)
    end = len(df) + len(index_future_dates) - 1
    predict = model.predict(start=start, end=end, typ='levels').rename('ARIMA')
    
    # Transform predict from Series to DataFrame
    predict_df = pd.DataFrame(predict)
    
    # Reset the index to turn it into a column
    predict_df = predict_df.reset_index(drop=True)
    
    # Add the future dates as a new column 'Index'
    predict_df['Index'] = index_future_dates

    # Reset the index of the column
    df = df.reset_index()
    df = df.rename(columns={'index': 'Date'})

    # Given timestamp
    start_date = df['Date'].iloc[-1]
    start_date = pd.Timestamp(start_date)
    
    # End date, which is 7 days after the start date
    end_date = start_date + pd.Timedelta(days=7)
    
    # Create a date range
    date_range = pd.date_range(start=start_date, end=end_date).strftime('%Y-%m-%d')

    p7p = []
    p7d = []
    for day in range(7):
        filtered_df = predict_df[predict_df['Index'] == date_range[day+1]]
        p7p.append(filtered_df['ARIMA'].values[0])
        p7d.append(str(date_range[day+1]))

    # Return the results as a dictionary and convert to JSON
    results = {
        'dates': p7d,
        'prices': p7p
    }

    # Write the results to a JSON file
    with open(json_path, 'w') as f:
        json.dump(results, f)

    return results


# MAIN FUNCTION
if __name__ == '__main__':
    # DICTIONARY
    commodity = {}

    # Map the elements from the lists to their corresponding numbers
    # commodity['rice'] = {'regular_milled_rice': (5, 0, 5), 'well_milled_rice': (2, 0, 2), 'premium_rice': (9, 0, 9), 'special_rice': (2, 0, 2)}
    # commodity['meat'] = {'beef_brisket': (3, 1, 3), 'beef_rump': (9, 0, 9), 'whole_chicken': (3, 1, 7), 'pork_belly': (4, 1, 5), 'pork_ham': (2, 1, 5)}
    # commodity['fish'] = {'alumahan': (3, 1, 6), 'bangus': (5, 1, 5), 'galunggong': (3, 1, 5), 'tilapia': (1, 0, 1)}
    # commodity['fruits'] = {'banana_lakatan': (3, 1, 3), 'calamansi': (3, 1, 9), 'mango': (4, 1, 7), 'papaya': (0, 0, 0)}
    # commodity['vegetables'] = {'cabbage': (1, 1, 16), 'carrots': (2, 1, 9), 'eggplant': (2, 1, 5), 'tomato': (12, 1, 9), 'white_potato': (19, 1, 5)}
    commodity['spices'] = {'onion': (1, 1, 2), 'garlic': (2, 1, 3)}

    for group_commodity, specific_commodities in commodity.items():
        for specific_commodity, parameters in specific_commodities.items():
            p, d, q = parameters
            csv_path = '../csv/' + group_commodity + '/' + specific_commodity + '.csv'
            json_path = 'json/' + specific_commodity + '.json'
            print(csv_path)
            print(json_path)
            
            # Generate JSON files
            result = predict(specific_commodity, csv_path, json_path, p, d, q)
            print(result)