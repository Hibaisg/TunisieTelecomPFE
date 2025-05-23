import sys
import os
import platform
from importlib.metadata import version

def log_environment():
    print("=== Environment Details ===")
    print(f"Python Path: {sys.executable}")
    print(f"Working Dir: {os.getcwd()}")
    print(f"PATH: {os.getenv('PATH')}\n")

def main():
    log_environment()
    
    requirements = {
        'xgboost': '3.0.1',
        'pandas': '2.2.3',
        'scikit-learn': '1.6.1',
        'numpy': '2.2.6'
    }

    all_ok = True
    for pkg, req_ver in requirements.items():
        try:
            installed = version(pkg)
            if installed != req_ver:
                print(f"Version mismatch: {pkg} (needs {req_ver}, found {installed})", file=sys.stderr)
                all_ok = False
        except Exception as e:
            print(f"Package error: {pkg} - {str(e)}", file=sys.stderr)
            all_ok = False

    if not all_ok:
        sys.exit(1)
    
    print("SUCCESS: Environment verified")
    sys.exit(0)

if __name__ == "__main__":
    main()