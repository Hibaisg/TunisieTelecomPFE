import pandas as pd
import pickle
import sys
from pathlib import Path
import xgboost as xgb
from sklearn.preprocessing import LabelEncoder

def main():
    try:
        print("=== Starting Prediction ===")
        input_csv = sys.argv[1]
        output_csv = sys.argv[2]
        
        # Load model
        model_path = Path(__file__).parent / "prediction.pkl"
        with open(model_path, 'rb') as f:
            model = pickle.load(f)
        
        # Read CSV with specified encoding
        data = pd.read_csv(input_csv, sep=';', encoding='ISO-8859-1')
        
        # Check required columns
        required_cols = ['Anciennete', 'NOM_LA', 'NomOffre','MONTANT_SUBVENTION', 'PrixOffre']
        missing = [col for col in required_cols if col not in data.columns]
        if missing:
            print(f"ERROR: Missing required columns: {missing}", file=sys.stderr)
            sys.exit(1)
        
        # Convert categorical columns
        label_encoders = {}
        for col in ['NOM_LA', 'NomOffre']:
            le = LabelEncoder()
            data[col] = le.fit_transform(data[col].astype(str))
            label_encoders[col] = le
        
        # Prepare features
        X = data[required_cols]
        
        # Predict
        predictions = model.predict(X)
        data['risque_churn'] = ['risque' if p == 1 else 'non_risque' for p in predictions]
        
        # Save results
        data.to_csv(output_csv, sep=';', index=False, encoding='ISO-8859-1')
        print("SUCCESS: Predictions completed")
        
    except Exception as e:
        print(f"ERROR: {str(e)}", file=sys.stderr)
        sys.exit(1)

if __name__ == "__main__":
    main()
