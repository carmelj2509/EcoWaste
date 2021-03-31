import sys
import pickle
from datetime import date

vegetable = sys.argv[1]

harvest = sys.argv[2]


new_data = [["2016", vegetable, harvest]]

loaded_model = pickle.load(open('ml/model.pkl', 'rb'))
loaded_encoder = pickle.load(open('ml/encoder.pkl', 'rb'))

processed = loaded_encoder.transform(new_data[:1])
print(loaded_model.predict(processed)[0])
