from fastapi import FastAPI

app = FastAPI()

# GET Hello World
@app.get("/")
async def root():
    return {"message": "Hello World"}

# GET player by id
@app.get("/player/{player_id}")
async def get_player(player_id: int):
    return {"player_id": player_id}

# POST player by id
@app.post("/player/{player_id}")
async def create_player(player_id: int, player_name: str):
    return {"player_id": player_id, "player_name": player_name}

# PUT player by id
@app.put("/player/{player_id}")
async def update_player(player_id: int, player_name: str):
    return {"player_id": player_id, "player_name": player_name}

# DELETE player by id
@app.delete("/player/{player_id}")
async def delete_player(player_id: int):
    return {"player_id": player_id}

# GET player by name
@app.get("/player/{player_name}")
async def get_player_by_name(player_name: str):
    return {"player_name": player_name}

# POST player by name
@app.post("/player/{player_name}")
async def create_player_by_name(player_name: str):
    return {"player_name": player_name}