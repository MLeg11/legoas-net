# legoas.net — Setup & Deployment Guide

## Server
- **Host**: Raspberry Pi 4B
- **OS**: Raspberry Pi OS
- **Web server**: nginx
- **Backend**: PHP, MySQL
- **Tunnel**: Cloudflare Tunnel (cloudflared)

## Database
- Runs inside a Docker container named `db`
- Managed via docker-compose
- Do NOT store credentials in PHP files — use environment variables

## Staging Environment
- Location: /home/pi4b_001/staging-docker/
- Start: cd /home/pi4b_001/staging-docker && docker-compose up -d
- Stop: docker-compose down
- Access: http://10.53.50.184:8081
- Files: ./website/ (bind-mounted into both nginx and php containers)
- Database: staging_db (credentials in .env file, never in Git)

## SSH Access
```bash
ssh pi4b_001@10.53.50.84
```

## Website Directory (on Pi)
```
/var/www/html
```

## Local Working Directory (Windows)
```
C:\Users\Marc\Documents\www
```

## Deploy Workflow
1. Edit files locally in `C:\Users\Marc\Documents\www`
2. `git add .`
3. `git commit -m "type: description"`
4. `git push origin dev`
5. SSH into Pi → `cd /var/www/html` → `git pull origin dev`

## Commit Message Format
- `feat:` new feature or page
- `fix:` bug fix
- `style:` visual/CSS change
- `docs:` documentation update
- `chore:` maintenance (updating packages, configs)

## Staging Stack Commands (reference)

# Start
cd /home/pi4b_001/staging-docker && docker-compose up -d

# Stop
docker-compose down

# Full reset (wipes database)
docker-compose down -v && docker-compose up -d --build

# Check status
docker ps

# View logs
docker logs staging_mysql --tail 20
docker logs staging_php --tail 20
docker logs staging_nginx --tail 20

# Verify env vars inside PHP container
docker exec staging_php env | grep MYSQL

## Cloudflare Tunnel

- Tunnel name: homelab
- Tunnel ID: 74b26519-8c42-4eb7-b254-098d8e17d6a3
- Type: CLI-managed (config file mode)
- Credentials: /home/pi4b_001/.cloudflared/74b26519-8c42-4eb7-b254-098d8e17d6a3.json
- Config: /home/pi4b_001/.cloudflared/config.yml
- Service: /etc/systemd/system/cloudflared.service

### Routes
- legoas.net → localhost:80 (public site)
- www.legoas.net → localhost:80 (public site)
- home.legoas.net → localhost:80 (private dashboard)

### Managing Routes
To add a route:
1. Edit ~/.cloudflared/config.yml on the Pi
2. sudo systemctl restart cloudflared

To add a DNS record for a new route:
cloudflared tunnel route dns homelab subdomain.legoas.net

### Tunnel Commands Reference
- Status: sudo systemctl status cloudflared
- Restart: sudo systemctl restart cloudflared
- Logs: journalctl -xeu cloudflared.service --no-pager | tail -30
- List tunnels: cloudflared tunnel list