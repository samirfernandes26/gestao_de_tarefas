import styled from 'styled-components';

export const PageContainer = styled.div`
    padding: 3rem;
    min-height: 100vh;
    background: linear-gradient(120deg, #05060a, #0a0d13);
    color: #d1d5db;
    font-family: 'Orbitron', 'Inter', sans-serif;
    background-image: url('https://www.transparenttextures.com/patterns/stardust.png');
    background-blend-mode: overlay;
    animation: stars-float 90s linear infinite;

    @keyframes stars-float {
        from {
            background-position: 0 0;
        }
        to {
            background-position: 1200px 800px;
        }
    }
`;

export const Header = styled.header`
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2.5rem;

    h1 {
        font-size: 2.5rem;
        background: linear-gradient(90deg, #3cf2ff, #8b5cf6);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 0 0 10px #3cf2ff;
        letter-spacing: 1.8px;
    }

    a {
        padding: 0.75rem 1.5rem;
        font-weight: bold;
        color: #fff;
        background: linear-gradient(135deg, #8b5cf6, #3cf2ff);
        box-shadow: 0 0 15px rgba(139, 92, 246, 0.4);
        border-radius: 14px;
        text-decoration: none;
        transition: all 0.3s ease;

        &:hover {
            background: #3cf2ff;
            color: #05060a;
            box-shadow: 0 0 30px #3cf2ff;
        }
    }
`;

export const Table = styled.table`
    width: 100%;
    background: rgba(20, 22, 29, 0.85);
    backdrop-filter: blur(18px);
    border-radius: 16px;
    border: 1px solid rgba(255, 255, 255, 0.05);
    box-shadow: 0 0 40px rgba(0, 0, 0, 0.3);
    overflow: hidden;
    border-collapse: collapse;
`;

export const Thead = styled.thead`
    background: rgba(255, 255, 255, 0.04);

    th {
        padding: 1.2rem;
        text-align: left;
        color: #60a5fa;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.08rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }
`;

export const Tbody = styled.tbody`
    td {
        padding: 1.2rem;
        border-top: 1px solid rgba(255, 255, 255, 0.03);
        color: #d1d5db;
    }

    tr {
        transition: background 0.25s ease;

        &:hover {
            background: rgba(255, 255, 255, 0.02);
        }
    }

    td:last-child {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    a,
    button {
        background: transparent;
        border: none;
        color: #8b5cf6;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;

        &:hover {
            color: #3cf2ff;
            text-shadow: 0 0 10px #3cf2ff;
            transform: scale(1.05);
        }
    }
`;
