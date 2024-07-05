from fastapi import FastAPI, HTTPException
import subprocess
import shlex

app = FastAPI()

# GET Hello World
@app.get("/")
async def root():
    return {"message": "Hello World"}

# GET player by name
@app.get("/player/{player_name}")
async def get_player_by_name(player_name: str):
    try:
        cmd = ["php", "../player.php", f"get_player('{player_name}')"]
        proc = subprocess.run(cmd, capture_output=True, text=True, check=True)
        return {"response": proc.stdout}
    except subprocess.CalledProcessError as e:
        raise HTTPException(status_code=500, detail=f"Error: {e.stderr}")

# POST player by name
@app.post("/player/{player_name}")
async def create_player_by_name(player_name: str):
    try:
        cmd = ["php", "../player.php", f"create_player('{player_name}')"]
        proc = subprocess.run(cmd, capture_output=True, text=True, check=True)
        return {"response": proc.stdout}
    except subprocess.CalledProcessError as e:
        raise HTTPException(status_code=500, detail=f"Error: {e.stderr}")
