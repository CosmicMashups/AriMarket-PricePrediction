import sys
import joblib
import re
import nltk
from nltk.stem import WordNetLemmatizer
from nltk.corpus import stopwords

# Ensure stopwords are available
try:
    stop_words = set(stopwords.words('english'))
except LookupError:
    nltk.download('stopwords', quiet=True)
    stop_words = set(stopwords.words('english'))

nltk.download('wordnet', quiet=True)

# Initialize lemmatizer
lemmatizer = WordNetLemmatizer()

# Preprocessing function
def preprocess_text(text):
    tokens = re.findall(r'\b\w+\b', text.lower())
    return ' '.join(lemmatizer.lemmatize(word) for word in tokens if word not in stop_words)

# Load model and vectorizer
def load_model_and_vectorizer():
    try:
        model = joblib.load('joblib/sentiment_model.joblib')
        vectorizer = joblib.load('joblib/vectorizer.joblib')
        return model, vectorizer
    except FileNotFoundError:
        sys.exit("Error: Model and vectorizer files not found.")

# Main script
if len(sys.argv) < 2:
    sys.exit("Error: No text provided for sentiment analysis.")

input_text = sys.argv[1]
model, vectorizer = load_model_and_vectorizer()

# Process and predict
processed_text = preprocess_text(input_text)
text_vector = vectorizer.transform([processed_text])
prediction = model.predict(text_vector)

# Output result
print(prediction[0].lower())