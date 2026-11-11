# NIDS Lab Architecture

## 1. Project Overview

This project implements a Network Intrusion Detection System (NIDS) using Suricata. The laboratory consists of two virtual machines communicating over a local network.

## 2. Lab Environment

| Component | Role | IP Address |
|---|---|---|
| Ubuntu 22.04 | NIDS server running Suricata 6.0.4 | 192.168.1.25 |
| Kali Linux | Machine used to generate and simulate network traffic | 192.168.1.33 |

## 3. Logical Architecture

Kali Linux generates different types of network traffic targeting the Ubuntu machine. Suricata monitors network packets through the `ens33` interface and applies custom detection rules.

Detected events are recorded in log files, including `fast.log` and `eve.json`.

## 4. Detection Scenarios

- **ICMP traffic:** Detection of Ping requests.
- **SYN scan:** Detection of repeated TCP SYN packets.
- **HTTP POST requests:** Detection of HTTP POST traffic.
- **SSH connection attempts:** Detection of repeated TCP connection attempts targeting port 22.

## 5. Expected Results

The system identifies network activities matching the configured detection rules and generates alerts containing information about the source, destination, and type of traffic.
